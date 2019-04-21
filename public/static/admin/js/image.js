$(function() {
    $("#file_upload").uploadifive({
        'uploadScript'        : SCOPE.image_upload,
        'buttonText'      : '图片上传',
        'fileTypeDesc'    : 'Image files',
        'fileObjName'     : 'file',
        'fileTypeExts'    : '*.gif; *.jpg; *.png',
        'onUploadComplete' : function(file, data) {
                var obj = JSON.parse(data);
                $("#upload_org_code_img").attr("src", obj.path);
                $("#file_upload_image").attr("value", obj.path);
                $("#upload_org_code_img").show();

        }
    });

    $("#file_upload_other").uploadifive({
        'uploadScript'        : SCOPE.image_upload,
        'buttonText'      : '图片上传',
        'fileTypeDesc'    : 'Image files',
        'fileObjName'     : 'file',
        'fileTypeExts'    : '*.gif; *.jpg; *.png',
        'onUploadComplete' : function(file, data) {
                var obj = JSON.parse(data);
                $("#upload_org_code_img_other").attr("src", obj.path);
                $("#file_upload_image_other").attr("value", obj.path);
                $("#upload_org_code_img_other").show();

        }
    });
});