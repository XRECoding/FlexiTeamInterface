<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;


class Authentication implements FilterInterface {

    public function before(RequestInterface $request, $arguments = null) {
        if (session()->get('email') == null) {
            return redirect()->to(base_url().'/Login/index');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {
        // TODO: Implement after() method.
    }
}