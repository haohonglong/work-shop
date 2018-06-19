define({ "api": [
  {
    "type": "get",
    "url": "/eye/eye-card/index",
    "title": "获取打卡信息",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "user_id",
            "description": "<p>用户id</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "modules/api/controllers/eye/EyeCardController.php",
    "group": "D__phpstudy_WWW_youtong_modules_api_controllers_eye_EyeCardController_php",
    "groupTitle": "D__phpstudy_WWW_youtong_modules_api_controllers_eye_EyeCardController_php",
    "name": "GetEyeEyeCardIndex",
    "sampleRequest": [
      {
        "url": "http://youtong.shop/api/eye/eye-card/index"
      }
    ]
  },
  {
    "type": "post",
    "url": "/eye/eye-card/record",
    "title": "记录打卡",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "user_id",
            "description": "<p>用户id</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "eye_card_id",
            "description": "<p>当前卡的id</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "modules/api/controllers/eye/EyeCardController.php",
    "group": "D__phpstudy_WWW_youtong_modules_api_controllers_eye_EyeCardController_php",
    "groupTitle": "D__phpstudy_WWW_youtong_modules_api_controllers_eye_EyeCardController_php",
    "name": "PostEyeEyeCardRecord",
    "sampleRequest": [
      {
        "url": "http://youtong.shop/api/eye/eye-card/record"
      }
    ]
  },
  {
    "type": "get",
    "url": "/eye/eye-optometry-list/index",
    "title": "获取验光单信息",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "object",
            "description": ""
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "modules/api/controllers/eye/EyeOptometryListController.php",
    "group": "D__phpstudy_WWW_youtong_modules_api_controllers_eye_EyeOptometryListController_php",
    "groupTitle": "D__phpstudy_WWW_youtong_modules_api_controllers_eye_EyeOptometryListController_php",
    "name": "GetEyeEyeOptometryListIndex",
    "sampleRequest": [
      {
        "url": "http://youtong.shop/api/eye/eye-optometry-list/index"
      }
    ]
  },
  {
    "type": "post",
    "url": "/eye/eye-optometry-list/add",
    "title": "添加验光单",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "user_id",
            "description": "<p>用户id</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "VD",
            "description": "<p>镜眼距,单位mm.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "DSL",
            "description": "<p>左球面镜.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "DSR",
            "description": "<p>右球面镜</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "DCL",
            "description": "<p>左圆柱镜</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "DCR",
            "description": "<p>右圆柱镜</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "PDL",
            "description": "<p>左瞳距,单位mm</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "PDR",
            "description": "<p>右瞳距,单位mm</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "VAL",
            "description": "<p>左裸眼视力</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "VAR",
            "description": "<p>右裸眼视力</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "CVAL",
            "description": "<p>左矫正视力</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "CVAR",
            "description": "<p>右矫正视力</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "AL",
            "description": "<p>左眼轴向</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "AR",
            "description": "<p>右眼轴向</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "DL",
            "description": "<p>左眼镜的度数</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "DR",
            "description": "<p>右眼镜的度数</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "remak",
            "description": "<p>备注</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "1",
            "description": "<p>successfully</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "0",
            "description": "<p>fail</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "modules/api/controllers/eye/EyeOptometryListController.php",
    "group": "D__phpstudy_WWW_youtong_modules_api_controllers_eye_EyeOptometryListController_php",
    "groupTitle": "D__phpstudy_WWW_youtong_modules_api_controllers_eye_EyeOptometryListController_php",
    "name": "PostEyeEyeOptometryListAdd",
    "sampleRequest": [
      {
        "url": "http://youtong.shop/api/eye/eye-optometry-list/add"
      }
    ]
  },
  {
    "type": "post",
    "url": "/eye/eye-optometry-list/edit",
    "title": "修改验光单",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "user_id",
            "description": "<p>用户id</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "VD",
            "description": "<p>镜眼距,单位mm.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "DSL",
            "description": "<p>左球面镜.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "DSR",
            "description": "<p>右球面镜</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "DCL",
            "description": "<p>左圆柱镜</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "DCR",
            "description": "<p>右圆柱镜</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "PDL",
            "description": "<p>左瞳距,单位mm</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "PDR",
            "description": "<p>右瞳距,单位mm</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "VAL",
            "description": "<p>左裸眼视力</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "VAR",
            "description": "<p>右裸眼视力</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "CVAL",
            "description": "<p>左矫正视力</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "CVAR",
            "description": "<p>右矫正视力</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "AL",
            "description": "<p>左眼轴向</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "AR",
            "description": "<p>右眼轴向</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "DL",
            "description": "<p>左眼镜的度数</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "DR",
            "description": "<p>右眼镜的度数</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "remak",
            "description": "<p>备注</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "1",
            "description": "<p>successfully</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "0",
            "description": "<p>fail</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "modules/api/controllers/eye/EyeOptometryListController.php",
    "group": "D__phpstudy_WWW_youtong_modules_api_controllers_eye_EyeOptometryListController_php",
    "groupTitle": "D__phpstudy_WWW_youtong_modules_api_controllers_eye_EyeOptometryListController_php",
    "name": "PostEyeEyeOptometryListEdit",
    "sampleRequest": [
      {
        "url": "http://youtong.shop/api/eye/eye-optometry-list/edit"
      }
    ]
  },
  {
    "type": "post",
    "url": "/eye/person-card/add",
    "title": "添加人员卡",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "title",
            "description": "<p>标题</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "tip",
            "description": "<p>提示</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "type",
            "description": "<p>卡的类型</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "modules/api/controllers/eye/PersonCardController.php",
    "group": "D__phpstudy_WWW_youtong_modules_api_controllers_eye_PersonCardController_php",
    "groupTitle": "D__phpstudy_WWW_youtong_modules_api_controllers_eye_PersonCardController_php",
    "name": "PostEyePersonCardAdd",
    "sampleRequest": [
      {
        "url": "http://youtong.shop/api/eye/person-card/add"
      }
    ]
  },
  {
    "type": "post",
    "url": "/eye/person-card/index",
    "title": "显示人员卡",
    "version": "0.0.0",
    "filename": "modules/api/controllers/eye/PersonCardController.php",
    "group": "D__phpstudy_WWW_youtong_modules_api_controllers_eye_PersonCardController_php",
    "groupTitle": "D__phpstudy_WWW_youtong_modules_api_controllers_eye_PersonCardController_php",
    "name": "PostEyePersonCardIndex",
    "sampleRequest": [
      {
        "url": "http://youtong.shop/api/eye/person-card/index"
      }
    ]
  }
] });
