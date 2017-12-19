export const checkTelePhone = (s) => {


    var reg = /^1[3|4|5|7|8][0-9]{9}$/;

    return reg.test(s);
};