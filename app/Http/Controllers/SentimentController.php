<?php


namespace App\Http\Controllers;

use App\Http\Requests\SentimentRequest;
use App\Http\Resources\SentimentResource;
use App\Models\Sentiment;
use Sentiment\Analyzer;
use Illuminate\Http\Request;
class SentimentController
{
    private Analyzer $analyze;
    public function __construct(Analyzer $an)
    {
        $this->analyze = $an;
    }
    /* this function to add sentiment in DB and get rank of message like positive , negative and netural */
    public function addSentiment(SentimentRequest $request)
    {
        /* here we update the dictionary of lexicon */
        $updateWords = [
            'new'=> '1.5',
            'create ' => '1.0',
            'covid ' => '-2.5',
            'Vaccine'=>'-2.0'
        ];

        $this->analyze->updateLexicon($updateWords);
        $rate = $this->analyze->getSentiment($request->message)['compound'];

        /* here this code is preprocessing of how data will enter to database so will facilitate when retirive */
        $sentiment = 0;
        if($rate > 0 && $rate < 1)
            $sentiment = 2;
        else if($rate < 0)
            $sentiment = 3;
        else
            $sentiment = 1;

        Sentiment::create([
            'message'      => $request->message,
            'sentiment'        => $sentiment
        ]);
        return redirect()->route('home');
    }
    /* retrieve data like attached file in task mail like dictionary */
    public function analysisSentiment()
    {
        $data = Sentiment::select('message','sentiment')->get();
        return response()->json([
            'Entries'=>[
                'Entry'=>[
                    Sentiment::select('message','sentiment')->orderBy('sentiment')->get()
                ]
            ]
        ]);
    }
    /* get all sentiment and retrieve it to show in web */
    public function getAllSentiment()
    {
        $all_data = Sentiment::select('message','sentiment','id')->orderBy('sentiment')->get();
        return view('sentimentTable',compact('all_data'));
    }
}
