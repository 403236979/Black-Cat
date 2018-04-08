export const checkTelePhone = (s) => {


    var reg = /^1[3|4|5|7|8][0-9]{9}$/;

    return reg.test(s);
};
export const checkPassword = (password) => {
    let pswPatten = new RegExp(/^(?![^a-zA-Z]+$)(?!\D+$).{8,16}$/);


    return pswPatten.test(password);
};

/*
* 8~16位
* */

export const checkPasswordV2 = (password2) => {
    let pswPatten = new RegExp(/^(?![^a-zA-Z]+$)(?!\D+$).{8,16}$/);

    return pswPatten.test(password2);
};

export const checkCode = (code) => {
    let pswPatten = new RegExp('^.{6}$');


    return pswPatten.test(code);
};

export const checkEmail = (email) => {
    let emailPatten = new RegExp(/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]+$/);

    return emailPatten.test(email);
};

export const getProArray = function (data) {
    var array = [];
    for (var i = 0; i < data.length; i++) {
        array.push(data[i]["name"]);
    }
    return array;
};

export const getCityArray = function (p, data) {

    for (var i = 0; i < data.length; i++) {
        if (p == data[i]["name"]) {
            var array = [];
            for (var j = 0; j < data[i]["city"].length; j++) {
                array.push(data[i]["city"][j]["name"]);
            }
            if (array.length != 0) {
                return array;
            } else {
                array.push(p);
                return array;
            }

        }
    }

};


export const getAreaArray = function (p, c, data) {
    for (var i = 0; i < data.length; i++) {
        if (p == data[i]["name"]) {
            var array = [];
            for (var j = 0; j < data[i]["city"].length; j++) {
                if (c == data[i]["city"][j]["name"]) {
                    var area_array = [];
                    for (var k = 0; k < data[i]["city"][j]['area'].length; k++) {
                        area_array.push(data[i]["city"][j]['area'][k]);
                    }
                    if (area_array.length != 0) {
                        return area_array;
                    } else {
                        area_array.push(c);
                        return area_array;
                    }
                }
            }
        }
    }
};