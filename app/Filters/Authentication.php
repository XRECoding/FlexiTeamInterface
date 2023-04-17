<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;


class Authentication implements FilterInterface {

    public function before(RequestInterface $request, $arguments = null) {
        // TODO: Implement before() method.
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {
        // TODO: Implement after() method.
    }
}