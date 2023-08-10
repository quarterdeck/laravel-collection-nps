<?php

namespace Quarterdeck;

use Illuminate\Support\ServiceProvider;

class QuarterdeckUIServiceProvider extends ServiceProvider
{
	public function boot()
	{
		//
	}

	public function register()
	{
		Collection::macro('nps', function () {
			return $this->whereInStrict(null, range(0, 10))
				->map(function ($score) {
					return match ($score) {
						0,1,2,3,4,5,6 => 'detractor',
						7,8 => 'passive',
						9,10 => 'promoter',
					};
				})
				->countBy()
				->pipe(function ($scores) {
					if ($scores->isEmpty()) {
						return 0;
					}

					$sum = $scores->sum();

					$percent_promoters = $scores['promoter'] / $sum;
					$percent_detractors = $scores['detractor'] / $sum;
					$nps = ($percent_promoters - $percent_detractors) * 100;

					return intval(round($nps));
				});
		});
	}
}
