<?php

/********************************/

/* Upload Image */

/********************************/
function UploadImage($file, $destinationPath)
{
    try {
        $imgName = $file->getClientOriginalName();
        $ext = explode('?', \File::extension($imgName));
        $main_ext = $ext[0];
        $rand_no = time() . "_" . rand(1, 10000);
        $finalName = $rand_no . '.' . $main_ext;
        $file->move(public_path($destinationPath), $finalName);

        if ($main_ext == 'mp4') {
            $thumb_name = $rand_no . ".png";
            $inputFile = $destinationPath . '/' . $finalName;
            $thumbpath = $destinationPath . "/" . $rand_no . ".png";

            $FFmpeg = new \FFMpeg;
            $upload_shell_video = "ffmpeg -i $file -vcodec h264 -acodec mp2 $inputFile";
            echo shell_exec($upload_shell_video);

            $shell = "ffmpeg -i " . $inputFile . " -frames:v 1 -q:v 2 -vf 'scale=480:480:force_original_aspect_ratio=increase,crop=480:480' " . $thumbpath;
            echo shell_exec($shell);
        }

        return $path = $destinationPath . '/' . $finalName;
    } catch (\Execption $e) {
        $response['status'] = false;
        $response['message'] = $e->getMessage()->withInput();
        return $response;
    }
}
