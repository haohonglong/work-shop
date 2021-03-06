define({ "api": [
  {
    "type": "post",
    "url": "/cashback/apply",
    "title": "申请政府返现",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "userid",
            "description": "<p>用户ID</p>"
          },
          {
            "group": "Parameter",
            "type": "Array",
            "optional": false,
            "field": "pic_list",
            "description": "<p>上传场景的图片</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "pic_optometry",
            "description": "<p>上传验光单的图片</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "remark",
            "description": "<p>备注</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "pic_list:",
          "content": " [\n   {\"pic_url\":\"http:\\/\\/youtong.shop\\/uploads\\/image\\/d4\\/d4ed9472d893effc07dce8b394bad1b3.jpg\"},\n   {\"pic_url\":\"http:\\/\\/youtong.shop\\/uploads\\/image\\/36\\/36b6c241664678142fbd77f7f49b7ded.jpg\"}\n    ...\n]",
          "type": "Array"
        }
      ]
    },
    "group": "Cashback",
    "version": "0.0.0",
    "filename": "modules/api/controllers/CashbackController.php",
    "groupTitle": "Cashback",
    "name": "PostCashbackApply",
    "sampleRequest": [
      {
        "url": "http://youtong.shop/api/cashback/apply"
      }
    ]
  },
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
    "group": "D__phpStudy_www_youtong_modules_api_controllers_eye_EyeCardController_php",
    "groupTitle": "D__phpStudy_www_youtong_modules_api_controllers_eye_EyeCardController_php",
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
    "group": "D__phpStudy_www_youtong_modules_api_controllers_eye_EyeCardController_php",
    "groupTitle": "D__phpStudy_www_youtong_modules_api_controllers_eye_EyeCardController_php",
    "name": "PostEyeEyeCardRecord",
    "sampleRequest": [
      {
        "url": "http://youtong.shop/api/eye/eye-card/record"
      }
    ]
  },
  {
    "type": "get",
    "url": "/eye/eye-info/world-count/",
    "title": "获取世界卫生组织全部数据",
    "version": "0.0.0",
    "filename": "modules/api/controllers/eye/EyeInfoController.php",
    "group": "D__phpStudy_www_youtong_modules_api_controllers_eye_EyeInfoController_php",
    "groupTitle": "D__phpStudy_www_youtong_modules_api_controllers_eye_EyeInfoController_php",
    "name": "GetEyeEyeInfoWorldCount",
    "sampleRequest": [
      {
        "url": "http://youtong.shop/api/eye/eye-info/world-count/"
      }
    ]
  },
  {
    "type": "get",
    "url": "/eye/eye-optometry-list/index",
    "title": "获取验光单信息",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "userid",
            "description": "<p>用户id</p>"
          }
        ]
      }
    },
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
    "group": "D__phpStudy_www_youtong_modules_api_controllers_eye_EyeOptometryListController_php",
    "groupTitle": "D__phpStudy_www_youtong_modules_api_controllers_eye_EyeOptometryListController_php",
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
    "group": "D__phpStudy_www_youtong_modules_api_controllers_eye_EyeOptometryListController_php",
    "groupTitle": "D__phpStudy_www_youtong_modules_api_controllers_eye_EyeOptometryListController_php",
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
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "token_id",
            "description": "<p>修改时的口令</p>"
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
    "group": "D__phpStudy_www_youtong_modules_api_controllers_eye_EyeOptometryListController_php",
    "groupTitle": "D__phpStudy_www_youtong_modules_api_controllers_eye_EyeOptometryListController_php",
    "name": "PostEyeEyeOptometryListEdit",
    "sampleRequest": [
      {
        "url": "http://youtong.shop/api/eye/eye-optometry-list/edit"
      }
    ]
  },
  {
    "type": "get",
    "url": "/eye/eye-record/index",
    "title": "眼睛健康记录",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "userid",
            "description": ""
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "modules/api/controllers/eye/EyeRecordController.php",
    "group": "D__phpStudy_www_youtong_modules_api_controllers_eye_EyeRecordController_php",
    "groupTitle": "D__phpStudy_www_youtong_modules_api_controllers_eye_EyeRecordController_php",
    "name": "GetEyeEyeRecordIndex",
    "sampleRequest": [
      {
        "url": "http://youtong.shop/api/eye/eye-record/index"
      }
    ]
  },
  {
    "type": "post",
    "url": "/eye/eye-record/add",
    "title": "眼睛健康记录添加",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "user_id",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "day",
            "description": "<p>天数</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "type",
            "description": "<p>症状类型</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "method",
            "description": "<p>治疗方法</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "feel",
            "description": "<p>感受度</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "tip",
            "description": "<p>小提示</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "modules/api/controllers/eye/EyeRecordController.php",
    "group": "D__phpStudy_www_youtong_modules_api_controllers_eye_EyeRecordController_php",
    "groupTitle": "D__phpStudy_www_youtong_modules_api_controllers_eye_EyeRecordController_php",
    "name": "PostEyeEyeRecordAdd",
    "sampleRequest": [
      {
        "url": "http://youtong.shop/api/eye/eye-record/add"
      }
    ]
  },
  {
    "type": "post",
    "url": "/eye/eye-record/edit",
    "title": "眼睛健康记录修改",
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
            "field": "day",
            "description": "<p>天数</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "type",
            "description": "<p>症状类型</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "method",
            "description": "<p>治疗方法</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "feel",
            "description": "<p>感受度</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "tip",
            "description": "<p>小提示</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "modules/api/controllers/eye/EyeRecordController.php",
    "group": "D__phpStudy_www_youtong_modules_api_controllers_eye_EyeRecordController_php",
    "groupTitle": "D__phpStudy_www_youtong_modules_api_controllers_eye_EyeRecordController_php",
    "name": "PostEyeEyeRecordEdit",
    "sampleRequest": [
      {
        "url": "http://youtong.shop/api/eye/eye-record/edit"
      }
    ]
  },
  {
    "type": "post",
    "url": "/eye/person-card/index",
    "title": "显示人员卡",
    "version": "0.0.0",
    "filename": "modules/api/controllers/eye/PersonCardController.php",
    "group": "D__phpStudy_www_youtong_modules_api_controllers_eye_PersonCardController_php",
    "groupTitle": "D__phpStudy_www_youtong_modules_api_controllers_eye_PersonCardController_php",
    "name": "PostEyePersonCardIndex",
    "sampleRequest": [
      {
        "url": "http://youtong.shop/api/eye/person-card/index"
      }
    ]
  },
  {
    "type": "get",
    "url": "/eye/user/index/",
    "title": "显示个人信息",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "userid",
            "description": "<p>用户ID</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "modules/api/controllers/eye/UserController.php",
    "group": "D__phpStudy_www_youtong_modules_api_controllers_eye_UserController_php",
    "groupTitle": "D__phpStudy_www_youtong_modules_api_controllers_eye_UserController_php",
    "name": "GetEyeUserIndex",
    "sampleRequest": [
      {
        "url": "http://youtong.shop/api/eye/user/index/"
      }
    ]
  },
  {
    "type": "get",
    "url": "/eye/user/list/",
    "title": "列出家庭所有成员",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>家庭ID</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "modules/api/controllers/eye/UserController.php",
    "group": "D__phpStudy_www_youtong_modules_api_controllers_eye_UserController_php",
    "groupTitle": "D__phpStudy_www_youtong_modules_api_controllers_eye_UserController_php",
    "name": "GetEyeUserList",
    "sampleRequest": [
      {
        "url": "http://youtong.shop/api/eye/user/list/"
      }
    ]
  },
  {
    "type": "post",
    "url": "/eye/user/modify/",
    "title": "修改个人信息",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "userid",
            "description": "<p>用户ID</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "age",
            "description": "<p>年龄</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "ill_age",
            "description": "<p>近视几年了</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "f_type",
            "description": "<p>家庭成员特征：1:父母，2：孩子，3：老人</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>用户真实姓名</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "phone",
            "description": "<p>联系手机号码</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "modules/api/controllers/eye/UserController.php",
    "group": "D__phpStudy_www_youtong_modules_api_controllers_eye_UserController_php",
    "groupTitle": "D__phpStudy_www_youtong_modules_api_controllers_eye_UserController_php",
    "name": "PostEyeUserModify",
    "sampleRequest": [
      {
        "url": "http://youtong.shop/api/eye/user/modify/"
      }
    ]
  },
  {
    "type": "get",
    "url": "/eye/eye-info/count/",
    "title": "统计眼睛数据",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "date",
            "description": "<p>按年份筛选</p>"
          }
        ]
      }
    },
    "group": "Eyeinfo",
    "version": "0.0.0",
    "filename": "modules/api/controllers/eye/EyeInfoController.php",
    "groupTitle": "Eyeinfo",
    "name": "GetEyeEyeInfoCount",
    "sampleRequest": [
      {
        "url": "http://youtong.shop/api/eye/eye-info/count/"
      }
    ]
  },
  {
    "type": "post",
    "url": "/eye/family/create/",
    "title": "创建家庭号",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>家庭号ID</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "name",
            "description": "<p>家庭昵称</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "userid",
            "description": "<p>用户ID</p>"
          }
        ]
      }
    },
    "group": "Family",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "code",
            "description": "<p>0:失败 ;1:成功;2:家庭号不对;3：家庭号已存在;4：没有此用户.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "modules/api/controllers/eye/FamilyController.php",
    "groupTitle": "Family",
    "name": "PostEyeFamilyCreate",
    "sampleRequest": [
      {
        "url": "http://youtong.shop/api/eye/family/create/"
      }
    ]
  }
] });
