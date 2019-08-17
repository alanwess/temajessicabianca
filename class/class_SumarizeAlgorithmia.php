<?php

	require_once 'vendor/autoload.php';

	class SumarizeAlgorithmia {

		public function SumarizebyText($text){

			$client = Algorithmia::client("simZosLWB0O4NrowzNufJ2XwVJf1");
			$algo = $client->algo("nlp/Summarizer/0.1.8");
			$algo->setOptions(["timeout" => 300]);

			return $algo->pipe($text)->result;

		}

	}

?>