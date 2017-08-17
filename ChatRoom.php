<?php

class ChatRoom {
    protected $participant;
    protected $messages;
    protected $name;
    protected $topic;

    public function alias() {
        return $this->alias;
    }

    public function SetAlias($alias) {
        $this->alias = $alias;
        return $this;
    }

    public function GetTopic() {
        return $this->topic;
    }

    public function SetTopic($topic) {
        $this->topic = $topic;
        return $this;  // for fluent setters
    }

    public function Join($mem) {
        $this->participants[] = $mem;
        return $this; // for fluent setters
    }

    public function Leave($mem) {
        foreach ($this->participants as $participants) {
            if ($mem->GetEmail() === $participants->GetEmail()) {
                unset($participants); // may not work in PHP 7.1, unit-test will tell us
                return true;
            }
        }
        return false;
    }

    public function Participants() {
        return $this->participants;
    }
}
