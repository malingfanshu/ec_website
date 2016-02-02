/**
 * member.js文件
 * @author 陈培捷
 * @lastModifyTime 2016/02/01 10:45
 * Base64.encode("information");
 */

/****************************************登录验证部分***************************/

// 前端验证机制，需要引用jquery validation engine插件
$('#login_form').validationEngine('attach',{
    'addPromptClass':'formError-text',
    'autoHidePrompt':true,
    'autoHideDelay':3000,
    'autoPositionUpdate':true,
    'promptPosition': 'centerRight',
    'focusFirstField':true,
    'custom_error_messages':{
        'required':{
            'message':'必填内容'
        }
    },
    'onValidationComplete':function(form,status){
        if(status){
            login_check();
        }
    }
}); 

$("#login_check_btn").on('click',function(){
    $("#login_form").submit();
});

// ajax提交表单信息
function login_check(){
    var hidden_value = get_hidden_value(); // 获取页面的隐藏值
    $.ajax({
        url:hidden_value.check_url,
        type:"post",
        data:get_encrypt_seria($("#login_form").serialize()),
        dataType:"json",
        success:function(result){
            $("#verify").prop("src",hidden_value.verify_url); // 重新载入验证码
        }
    });
}

/******************************************************************************/

/********************************注册验证部分(step1)********************************************/

// 注册页面第一步：判断注册使用的手机号码是否可以使用
$("#register_phone_step1_phone").on('blur',function(e){
    if($(e.target).val() != '' && $(e.target).val() != ''){
        if(regexp_judge_format('cell_phone',$(e.target).val())){
            var result = check_phone_exist(get_hidden_value().check_phone_url,$(e.target).val());
            if(result.status == true){
                $("#get_register_phone_code").removeAttr('disabled');
                layer.msg("可以使用");
            }else{
                $("#get_register_phone_code").prop('disabled','disabled');
                layer.msg("手机号码已被使用");
            }
        }else{
            $("#get_register_phone_code").prop('disabled','disabled');
            layer.msg("手机号码不符合规范");
        }
    }else{
        $("#get_register_phone_code").prop('disabled','disabled');
    }
});

// ajax请求获得手机验证码
$("#get_register_phone_code").on('click',function(e){
    $.ajax({
        url:get_hidden_value().code_url,
        type:"post",
        data:{"phone":$("#register_phone_step1_phone").val()},
        dataType:"json",
        success:function(result){
            if(result.status == 'true'){
                layer.msg("发送成功");
            }else{
                layer.msg("发送失败，受到限制");
            }
        }
    });
});

// ajax请求判断注册验证1（手机号码和验证码）条件是否OK，OK跳入下一步完善资料页面
$("#register_phone_step1_next").on('click',function(e){
    $.ajax({
        url:get_hidden_value().verify_url,
        type:"post",
        data:{"phone":$("#register_phone_step1_phone").val(),"code":$("#register_phone_step1_code").val()},
        dataType:"json",
        success:function(result){
            var index = layer.load(0, {shade: false});
            window.location.href=result.url;
        }
    });
});



/****************************************************************************/

/********************************注册验证部分(step2)********************************************/

// 使用日历插件的方法
$('#register_phone_step2_calendar').cxCalendar();

// 前端验证机制，需要引用jquery validation engine插件
$('#register_phone_step2_form').validationEngine('attach',{
    'addPromptClass':'formError-text',
    'autoHidePrompt':true,
    'autoHideDelay':3000,
    'autoPositionUpdate':true,
    'promptPosition': 'centerRight',
    'focusFirstField':true,
    'custom_error_messages':{
        'required':{
            'message':'必填内容'
        }
    },
    'onValidationComplete':function(form,status){
        if(status){
            register_check();
        }
    }
}); 

$("#register_phone_step2_register").on('click',function(){
    $("#register_phone_step2_form").submit();
});

// ajax提交表单信息
function register_check(){
    var hidden_value = get_hidden_value(); // 获取页面的隐藏值
    $.ajax({
        url:hidden_value.check_url,
        type:"post",
        data:get_encrypt_seria($("#register_phone_step2_form").serialize()),
        dataType:"json",
        success:function(result){
            console.log(result);
            $("#verify").prop("src",hidden_value.verify_url); // 重新载入验证码
        }
    });
}

/****************************************************************************/