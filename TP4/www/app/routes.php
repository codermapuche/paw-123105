<?php
	$router->get('', 'Turnos@index');
	$router->get('turnos/index', 'Turnos@index');
	$router->get('turnos/nuevo', 'Turnos@nuevo');
	$router->get('turnos/ver', 'Turnos@ver');
	$router->get('turnos/editar', 'Turnos@editar');
	$router->get('turnos/borrar', 'Turnos@borrar');
	$router->post('turnos/guardar', 'Turnos@guardar');

	$router->get('not_found', 'Project@notFound');
	$router->get('internal_error', 'Project@internalError');
