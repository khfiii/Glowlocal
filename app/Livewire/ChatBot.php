<?php

namespace App\Livewire;

use Livewire\Component;
use Gemini\Laravel\Facades\Gemini;
use OpenAI\Laravel\Facades\OpenAI;

class ChatBot extends Component {

    protected $listeners = [
        'refresh' => '$refresh'
    ];

    public string $answer = '';
    public bool $showMessage = false;
    public string $question = '';
    public string $fullAnswer = '';

    public array $datas = [];

    public function render() {
        return view( 'livewire.chat-bot' );
    }

    public function send( $question ) {

        $data[ 'question' ] = $question;

        $result = Gemini::geminiPro()->generateContent( $question );

        $data[ 'answer' ] = $result->text();

        $this->answer = $result->text();

        array_push( $this->datas, $data );

    }
}
