<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SearchController extends BaseController
{
	public function __construct()
	{
		$this->db = db_connect();
	}

	public function index()
	{
		return view('search');
	}

	public function getNames()
	{
		$request = service('request');
		$postData = $request->getPost();

		$response = array();

		$data = array();

		$builder = $this->db->table("user");

		$names = [];

		if (isset($postData['query'])) {

			$query = $postData['query'];

			// Fetch record
			$builder->select('*');
			$builder->like('firstname', $query, 'both');
			$query = $builder->get();
			$data = $query->getResult();
		} else {

			// Fetch record
			$builder->select('*');
			$query = $builder->get();
			$data = $query->getResult();
		}

		foreach ($data as $users) {
			$names[] = array(
				"id" => $users->user_id,
				"text" => $users->firstname,
			);
		}

		$response['data'] = $names;

		return $this->response->setJSON($response);
	}

	public function Logina(){
		return view('logina');
	}
	public function ProcessLogina(){
		$request = service('request');
		$postData = $request->getPost();

		$response = array();

		$data = array();

		$builder = $this->db->table("user");

		$names = [];

		if (isset($postData['query'])) {

			$query = $postData['query'];

			// Fetch record
			$builder->select('*');
			$builder->like('firstname', $query, 'both');
			$query = $builder->get();
			$data = $query->getResult();
		} else {

			// Fetch record
			$builder->select('*');
			$query = $builder->get();
			$data = $query->getResult();
		}

		foreach ($data as $users) {
			$names[] = array(
				"id" => $users->user_id,
				"text" => $users->firstname,
			);
		}

		$response['data'] = $names;

		return $this->response->setJSON($response);
	}
}
