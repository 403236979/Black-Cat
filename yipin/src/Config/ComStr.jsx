export const checkTelePhone = (s) => {


    var reg = /^1[3|4|5|7|8][0-9]{9}$/;

    return reg.test(s);
};
export const checkPassword = (password) => {
    let pswPatten = new RegExp(/^(?![^a-zA-Z]+$)(?!\D+$).{8,16}$/);


    return pswPatten.test(password);
};

/*
* 8~16位无限制
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
