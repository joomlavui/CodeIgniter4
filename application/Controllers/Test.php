<?php namespace App\Controllers;

use CodeIgniter\Autoloader\FileLocator;
use CodeIgniter\Controller;
use CodeIgniter\Hooks\Hooks;

class Test //extends Controller
{
	protected $helpers = ['url'];

	public function index()
	{
		var_dump(codeigniter()->config->baseURL);

	    if ($this->request->getMethod() === 'post')
		{
			$file = $this->request->getFile('avatar');

			if ($file->isValid() && ! $file->hasMoved()) {

				$fileName = $file->getRandomName();
				$file->move(WRITEPATH.'uploads', $fileName);
			}
		}

		echo view('form');
	}

	//--------------------------------------------------------------------

	public function hooks()
	{
		Hooks::trigger('myhook');
	}

	//--------------------------------------------------------------------

	public function twodbs()
	{
	    $db1 = \Config\Database::connect('default');
	    $db2 = \Config\Database::connect('tests');

        echo view('form');

//		d($db1->listTables());
//		d($db2->listTables());
	}

	//--------------------------------------------------------------------

    public function vfs()
    {
        return view('form');
    }

    //--------------------------------------------------------------------

    public function locate()
    {
        $locator = service('locator');

        $routes = $locator->search('Config/Routes');
    }

}
