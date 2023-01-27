<?php

class Code
{
    private int $id_code;
    private Offer $offer;
    private string $generation_date;
    private string $codeString;
    private int $remaining_entries;

    public function __construct(
        Offer $offer,
        string $generation_date,
        string $code_string,
        int $remaining_entries,
        int $id_code = -1
    ) {
        $this->id_code = $id_code;
        $this->offer = $offer;
        $this->generation_date = $generation_date;
        $this->codeString = $code_string;
        $this->remaining_entries = $remaining_entries;
    }

    public function getId_code(): int
    {
        return $this->id_code;
    }

    public function getOffer(): Offer
    {
        return $this->offer;
    }

    public function getGenerationDate(): string
    {
        return $this->generation_date;
    }

    public function getCodeString(): string
    {
        return $this->codeString;
    }

    public function getRemainingEntries(): int
    {
        return $this->remaining_entries;
    }
}
