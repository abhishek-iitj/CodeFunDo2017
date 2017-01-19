package com.example.jarvis.loginapplication;

import android.util.Log;

import com.google.firebase.iid.FirebaseInstanceId;
import com.google.firebase.iid.FirebaseInstanceIdService;

/**
 * Created by jarvis on 1/19/2017.
 */

public class MyFirebaseInstanceIDService extends FirebaseInstanceIdService{
    public static final String TAG ="MyFirebaseIIDService";
    @Override
    public void onTokenRefresh() {
        // Get updated InstanceID token.
        String refreshedToken = FirebaseInstanceId.getInstance().getToken();
        Log.d(TAG, "Refreshed token: " + refreshedToken);

        //TODO: Implement this method to send any registration to your app's servers.
        storeToken(refreshedToken);
    }
    private void storeToken(String token) {
        //we will save the token in sharedpreferences later
        SharedPrefManager.getInstance(getApplicationContext()).saveDeviceToken(token);

    }
}
