package com.stech.rest;

import android.util.Log;

import com.loopj.android.http.JsonHttpResponseHandler;
import com.stech.rautresttest.HttpUtils;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import cz.msebera.android.httpclient.Header;
import cz.msebera.android.httpclient.entity.StringEntity;

public class RautConsumeService {

    public void CustomerSavePost(String url, StringEntity entity, String content_type){
        CallBackResponseHandler callBack = new CallBackResponseHandler();
        HttpUtils.post(null, url, entity, content_type, callBack);
    }

    public void getAllCustomers(String url){
        CallBackResponseHandler callBack = new CallBackResponseHandler();
        HttpUtils.get( url, null, callBack);
    }



}
