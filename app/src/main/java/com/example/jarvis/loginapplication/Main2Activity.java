//Android FCM Main Activity

package com.example.jarvis.loginapplication;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

public class Main2Activity extends AppCompatActivity {
    private Button buttonDisplayToken;
    private TextView textViewToken;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main2);

        textViewToken=(TextView)findViewById(R.id.textViewToken);
    }
    public void displayToken(View view){
        String token = SharedPrefManager.getInstance(this).getDeviceToken();
        //if token is not null
        if (token != null) {
            //displaying the token
            textViewToken.setText(token);
        } else {
            //if token is null that means something wrong
            textViewToken.setText("Token not generated");
        }
    }
}
