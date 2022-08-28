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
        HttpUtils.post(null, url, entity, content_type, new JsonHttpResponseHandler() {
            @Override
            public void onSuccess(int statusCode, Header[] headers, JSONObject response) {
                try {
                    JSONObject serverResp = new JSONObject(response.toString());
                    Log.d("supriya", "Response : "+serverResp);
                } catch (JSONException e) {
                    Log.d("supriya","Error Occurred "+e);
                    e.printStackTrace();
                }
            }
            @Override
            public void onFailure(int statusCode, Header[] headers, String responseString, Throwable throwable) {
                super.onFailure(statusCode, headers, responseString, throwable);
                Log.d("supriya", "OnFailure Method"+throwable.toString());
                Log.d("supriya", "Response body"+responseString);
                throwable.printStackTrace();
            }


            @Override
            public void onSuccess(int statusCode, Header[] headers, JSONArray timeline) {
                Log.d("supriya","OnSuccess method");
                // Pull out the first event on the public timeline

            }
        });
    }
}
