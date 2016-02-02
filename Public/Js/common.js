/**
 * 公共js函数文件
 * @author 陈培捷
 * @lastModifyTime 2016/01/28 16:22
 */

/**
 * 掩耳盗铃的base64对表单序列化的数据加密
 * @param string seria 序列化后的表单数据
 * @returns string 加密后的序列化数据
 */
function get_encrypt_seria(seria){
    var arrSeria =  seria.split("&");
    for(var i =0; i < arrSeria.length; i++){
        var arrTmp = arrSeria[i].split("=");
        arrTmp[1] = Base64.encode(arrTmp[1]); // 要先加载Base64.js文件
        arrSeria[i] = arrTmp.join("=");
    }
    seria = arrSeria.join("&");
    return seria;
}

/**
 * 返回本页（模板）中隐藏域的值
 */
function get_hidden_value(){
    return eval("("+$("#hidden_value").val()+")");
}

/**
 * ajax判断手机号码是否存在
 * @param string url 请求地址
 * @param string phone 判断的手机号码
 * @returns json
 */
function check_phone_exist(url,phone){
    var value = '';
    $.ajax({
        url:url,
        type:'post',
        async: false, //设为false就是同步请求
        dataType:'json',
        data:{"phone":phone},
        success:function(result){
            value = result;
        },
        error:function(){
            value = {"status":"false","info":"发送失败"};
        }
    });
    return value;
}

/**
 * 数据类型正则判断函数
 * @param string type 数据类型：手机号码、邮箱等
 * @param string value 要判断的数据的值
 * @returns boolean
 */
function regexp_judge_format(type,value){
    var result = true;
    switch(type){
        case 'cell_phone':
            if(!(/^1[3|4|5|7|8]\d{9}$/.test(value))){   
                result = false; 
            }
            break;
        case 'eamil':
            if(!(/^([.a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\\.[a-zA-Z0-9_-])+/).test(value)){
                result = false;
            }
            break;
    }
    return result;
}

