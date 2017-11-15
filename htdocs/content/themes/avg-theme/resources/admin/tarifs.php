<?php

Metabox::make('Informations renouvellement Adhérants', 'page', $options = ['template' => 'tarifs'])->set([
			Field::editor('renouvellement')
		]);

Metabox::make('Bloc de prix nouveaux adhérants', 'page', $options = ['template' => 'tarifs'])->set([
			Field::infinite('newPrices', [
				Field::text('newPriceTitle', ['title' => 'Titre / catégorie', 'required']),
				Field::media('newPriceImg', ['title' => 'Image']),
				Field::number('newPrice', ['title' => 'Tarif']),
				Field::text('newPriceAge', ['title' => 'Précision age'])
				], 
				['title' => 'Tarifs'])
		]);

Metabox::make('Bloc de prix renouvellement', 'page', $options = ['template' => 'tarifs'])->set([
			Field::infinite('prices', [
				Field::text('priceTitle', ['title' => 'Titre / catégorie']),
				Field::media('priceImg', ['title' => 'Image']),
				Field::number('price', ['title' => 'Tarif']),
				Field::text('priceAge', ['title' => 'Précision age'])
				], 
				['title' => 'Tarifs'])
		]);