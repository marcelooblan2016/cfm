<?php
namespace App\Services\Google\Interfaces;

interface GoogleInterface 
{
	public function listFiles(string $query = null): array;
}