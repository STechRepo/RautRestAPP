package com.stech.rautresttest;

import androidx.appcompat.app.AppCompatActivity;

import com.loopj.android.http.AsyncHttpClient;
import com.loopj.android.http.JsonHttpResponseHandler;
import com.loopj.android.http.RequestParams;
import com.stech.model.ModelService;
import com.stech.rautresttest.HttpUtils;
import com.stech.rest.RautConsumeService;
import com.stech.utils.Constants;
import com.stech.utils.PreparePayLoad;

import android.content.Context;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.IOException;
import java.io.UnsupportedEncodingException;

import cz.msebera.android.httpclient.Header;
import cz.msebera.android.httpclient.entity.StringEntity;


public class MainActivity extends AppCompatActivity {
    ModelService modelService = new ModelService();

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        Button callRestBtn = (Button) findViewById(R.id.call_btn);
        TextView respTextView = (TextView) findViewById(R.id.respView);
        callRestBtn.setOnClickListener(mCorkyListener);


    }

    public View.OnClickListener mCorkyListener = new View.OnClickListener() {
        public void onClick(View v) {
            modelService.customerDetSave();
        Log.d("supriya", "Onclick Action Done");
        }
    };
    public void callRestAPIGET(){
        Log.d("supriya", "Call Rest api method");
        RequestParams rp = new RequestParams();
        // rp.add("username", "aaa"); rp.add("password", "aaa@123");
        final String url = "api/customers/";
        JSONObject obj = null;
        HttpUtils.get(url, rp, new JsonHttpResponseHandler() {
            @Override
            public void onSuccess(int statusCode, Header[] headers, JSONObject response) {
                // If the response is JSONObject instead of expected JSONArray
                Log.d("supriya", "---------------- this is response : " + response);

                try {
                    JSONObject serverResp = new JSONObject(response.toString());
                    Log.d("supriya", "Response : "+serverResp);
                } catch (JSONException e) {
                    Log.d("supriya","Error Occurred "+e);
                    // TODO Auto-generated catch block
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