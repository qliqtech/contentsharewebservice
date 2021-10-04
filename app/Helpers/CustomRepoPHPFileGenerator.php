<?php


namespace App\Helpers;


class CustomRepoPHPFileGenerator
{

    public static function genarateInterfacePHPFile($modelName){

           // echo $_SERVER['DOCUMENT_ROOT'];die();

     //   $myfile = fopen("../Repository/"."I".$modelName."RepositoryInterface.php", "w") or die("Unable to open file!");


        $myfile = fopen("C:\Users\lapto\PhpstormProjects\contentshare\contentsharewebservice\app\Repository\I".$modelName."RepositoryInterface.php", "w") or die("Unable to open file!");


        $txt = "<?php


namespace App\Repository;



interface I".$modelName."RepositoryInterface extends IEloquentRepositoryInterface
{


}
";








        fwrite($myfile, $txt);

        fclose($myfile);


    }



    public static function genarateEloquentPHPFile($modelName){

        // echo $_SERVER['DOCUMENT_ROOT'];die();

        //   $myfile = fopen("../Repository/"."I".$modelName."RepositoryInterface.php", "w") or die("Unable to open file!");


        $myfile = fopen("C:\Users\lapto\PhpstormProjects\contentshare\contentsharewebservice\app\Repository\Eloquent/".$modelName."RepositoryInterface.php", "w") or die("Unable to open file!");


        $txt = '<?php


namespace App\Repository\Eloquent;


use App\Models\Resource;
use App\Repository\I'.$modelName.'RepositoryInterface;

class '.$modelName.'Repository extends BaseRepository implements I'.$modelName.'RepositoryInterface
{



    /**
     *
     * @param '.$modelName.' $model
     */
    public function __construct('.$modelName.' $model)
    {
        parent::__construct($model);
    }



}

';








        fwrite($myfile, $txt);

        fclose($myfile);


    }



}
