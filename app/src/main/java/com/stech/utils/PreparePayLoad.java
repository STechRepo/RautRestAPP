package com.stech.utils;

import android.util.Log;

import org.json.JSONException;
import org.json.JSONObject;

public class PreparePayLoad {
    public JSONObject customerSaveObj(){
        JSONObject saveObj = new JSONObject();
        try {
            saveObj.put("id","505");
            saveObj.put("name","Robot2");
            saveObj.put("lastName","chitti2");
            saveObj.put("mail","robot2@shankar2.com");
            saveObj.put("mobile","787878");
        } catch (JSONException e) {
            Log.d("RautLog","Exception : "+e.getMessage());
            throw new RuntimeException(e);
        }

        return saveObj;
    }
}
