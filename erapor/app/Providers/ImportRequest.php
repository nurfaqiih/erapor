<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ImportRequest extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	public function authorize()
    {
        return true;
    }

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		return [
			'excel' => 'mimes:application/vnd.ms-excel'
		];
	}

}
