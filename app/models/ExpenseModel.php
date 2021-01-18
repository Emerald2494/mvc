<?php
class ExpenseModel
{
    private $id;
    private $category_id;
    private $amount;
    private $qty;
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

    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
    }
    public function getCategoryId()
    {
        return $this->category_id;
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;
    }
    public function getAmount()
    {
        return $this->amount;
    }

    public function setQty($qty)
    {
        $this->qty = $qty;
    }
    public function getQty()
    {
        return $this->qty;
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
        return [
            "id" => $this->getId(),
            "category_id" => $this->getCategoryId(),
            "amount" => $this->getAmount(),
            "qty" => $this->getQty(),
            "user_id" => $this->getUserId(),
            "date" => $this->getDate(),
        ];
    }
}