<?php

namespace controller;

class BoardController extends ParentsController {
	protected function listGet() {
		return "view/list.php";
	}
}