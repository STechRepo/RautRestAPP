package com.stech.rest;

import android.util.Log;

import com.loopj.android.http.JsonHttpResponseHandler;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import cz.msebera.android.httpclient.Header;

public class CallBackResponseHandler extends JsonHttpResponseHandler {
    JSONObject respObj = new JSONObject();
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

    }



}
