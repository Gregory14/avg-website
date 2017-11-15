<?php

Metabox::make('Gallery Photo', 'page')->set([
			Field::collection('photos', ['type' => 'image'])
		]);

Metabox::make('Gallery Photo', 'post')->set([
			Field::collection('photos', ['type' => 'image'])
		]);
