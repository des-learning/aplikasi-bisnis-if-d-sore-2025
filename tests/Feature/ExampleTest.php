<?php

test('the application returns a successful response', function () {
    $response = $this->get('/');

    $response->assertStatus(404);
});

test('mengakses halaman admin, tanpa login akan di redirect ke halaman login',
function () {
    $response = $this->get('/admin');

    $response->assertStatus(302);
    $response->assertLocation('/admin/login');
}
);
