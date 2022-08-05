<?php

	namespace Config;

	class View {

		public function showView($view, $data = []) {

			if(file_exists("views/".$view.".php")) {

				require_once "views/".$view.".php";	

			}

			else {

				echo "erro";

			}

		}

	}