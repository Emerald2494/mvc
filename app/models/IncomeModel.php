<?php

class IncomeModel
{
    private $id;
    private $amount;
    private $category_id;
    private $user_id;
    private $date;

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }
    
    
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }
    public function getAmount()
    {
        return $this->amount;
    }

    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
    }
    public function getCategoryId()
    {
        return $this->category_id;
    }

    
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }
    public function getUserId()
    {
        return $this->user_id;
    }

    
    public function setDate($date)
    {
        $this->date = $date;
    }
    public function getDate()
    {
        return $this->date;
    }

    public function toArray()
    {
        return[
            "id" => $this->getId(),
            "amount" => $this->getAmount(),
            "category_id" => $this->getCategoryId(),
            "user_id" => $this->getUserId(),
            "date" => $this->getDate(),

        ];
    }
}