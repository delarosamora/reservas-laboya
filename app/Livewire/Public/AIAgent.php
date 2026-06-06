<?php

namespace App\Livewire\Public;

use App\Ai\Agents\BookingAgent;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\Attributes\On;
use Throwable;

class AIAgent extends Component
{

  public string $input = '';

  public bool $thinking = false;

  public array $messages = [];

  public string|null $conversationId = null;

  public function sendMessage(): void
  {
    $userMessage = trim($this->input);

    if (empty($userMessage)) {
        return;
    }

    $this->messages[] = [
        'role'    => 'user',
        'content' => $userMessage,
    ];

    $this->input = '';
    $this->thinking = true;

    $this->dispatch('message-added');
  }


  #[On('message-added')]
  public function getAiResponse(): void
  {
    $lastUserMessage = collect($this->messages)
        ->where('role', 'user')
        ->last();

    if (! $lastUserMessage) {
        $this->thinking = false;
        return;
    }

    try {
        $agent = new BookingAgent;

        if (is_null($this->conversationId)) {
            $response = $agent->prompt($lastUserMessage['content']);

            $this->conversationId = $response->conversationId;
        } else {
            $response = $agent
                ->continue($this->conversationId)
                ->prompt($lastUserMessage['content']);
        }

        $this->messages[] = [
            'role'    => 'assistant',
            'content' => (string) $response,
        ];

    } catch (Throwable $e) {
        Log::error($e->getMessage());
        Log::error($e->getTraceAsString());
        $this->messages[] = [
            'role'    => 'assistant',
            'content' => 'Sorry, I encountered an error. Please try again.',
        ];
    }

    $this->thinking = false;
  }

  public function render()
  {
      return view('livewire.public.ai-agent')->extends('components.layouts.public')->section('content');
  }
}
