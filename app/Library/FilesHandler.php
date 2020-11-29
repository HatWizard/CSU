<?php
use Illuminate\Support\Facades\Storage;

function WriteFiles($files, $path)
{
    $fileNames=Array();
    foreach($files as $file)
    {
        $filename = uniqid().".".$file->getClientOriginalExtension();
        Storage::disk('local')->put($path.$filename,file_get_contents($file));
        $fileNames[] = $filename;
    }
    return $fileNames;
}

    function DeleteFiles($fileNames, $path)
{
    foreach($fileNames as $fileName)
    {
        Storage::delete($path.$fileName);
    }
}
    

?>