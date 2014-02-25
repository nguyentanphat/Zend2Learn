<?php
return array (
		'controllers' => array (
				'invokables' => array (
						'Product\Controller\Product' => 'Product\Controller\ProductRestController',
						'Product\Controller\ProductCategory' => 'Product\Controller\ProductCategoryRestController', 
						'Product\Controller\Client' => 'Product\Controller\ClientController'
				) 
		),
		'router' => array (
				'routes' => array (
						'product' => array (
								'type' => 'segment',
								'options' => array (
										'route' => '/product[/:id]',
										'constraints' => array (
 												'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
												'id' => '[0-9]+' 
										),
										'defaults' => array (
												'controller' => 'Product\Controller\Product',
										) 
								)
						),
						'category' =>array(
								'type' => 'segment',
								'options' => array (
										'route' => '/category[/:id]',
										'constraints' => array (
												'id' => '[0-9]+'
										),
										'defaults' => array (
												'controller' => 'Product\Controller\ProductCategory',
										)
								)
						), 
						'client' => array(
								'type'    => 'segment',
								'options' => array(
										'route'    => '/client[/:table][/:action][/:id]',//
										'defaults' => array(
												'controller' => 'Product\Controller\Client',
												'action'     => 'index'
										),
								),
						),
						
				) 
		),
		
		'view_manager' => array (
				'template_path_stack' => array (
						'product' => __DIR__ . '/../view',
				) ,
				'strategies' => array (
						'ViewJsonStrategy',
				),
				'display_not-found-reason' =>true,
				'display_exceptions' =>true,
				'doctype' =>'HTML5',
		) 
);
