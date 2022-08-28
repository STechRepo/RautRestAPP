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
        Log.d("RautLog", "[ModelService :: customerDetSave()] -> Start ");
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
            Log.d("RautLog", "[ModelService :: customerDetSave()] -> All Done ");
        } catch (UnsupportedEncodingException e) {
            throw new RuntimeException(e);
        }

    }

    public void getAllCustomers() {
        Log.d("RautLog", "[ModelService :: getAllCustomers()] -> Start ");
        String url = Constants.GET_ALL_CUSTOMERS_URL;
        RautConsumeService consumer = new RautConsumeService();
        consumer.getAllCustomers(url);
        Log.d("RautLog", "[ModelService :: getAllCustomers()] -> All Done ");
    }
}
