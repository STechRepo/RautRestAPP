package com.stech.model;

import android.util.Log;

import com.stech.rest.RautConsumeService;
import com.stech.utils.Constants;
import com.stech.utils.PreparePayLoad;

import org.json.JSONObject;

import java.io.UnsupportedEncodingException;

import cz.msebera.android.httpclient.entity.StringEntity;

public class ModelService {
    public void customerDetSave() {
        Log.d("supriya", "Call Rest api method");
        PreparePayLoad customerPayload = new PreparePayLoad();
        try {
            JSONObject payLoad = customerPayload.customerSaveObj();
            String url = Constants.CUSTOMER_SAVE_URL;
            String content_Type = Constants.CONTENT_TYPE;
            StringEntity entity = null;
            entity = new StringEntity(String.valueOf(payLoad));
            entity.setContentType(content_Type);
            RautConsumeService consumer = new RautConsumeService();
            consumer.CustomerSavePost(url,entity,content_Type);
        } catch (UnsupportedEncodingException e) {
            throw new RuntimeException(e);
        }

    }
}
