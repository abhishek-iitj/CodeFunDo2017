package com.example.jarvis.loginapplication;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

import java.util.HashMap;

public class SessionActivity extends AppCompatActivity {
    private TextView tv1,tv2,tv3,tv4;
    private Session session;
    private Button btn;
    private DBHelper db;
    String[] result= new String[5];
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_session);
        //String str = getIntent().getStringExtra("Mobile");
        session=new Session(this);
        db=new DBHelper(this);

        result=db.getRow();

        tv1=(TextView)findViewById(R.id.tv1);
        tv2=(TextView)findViewById(R.id.tv2);
        tv3=(TextView)findViewById(R.id.tv3);
        tv4=(TextView)findViewById(R.id.tv4);
        btn=(Button)findViewById(R.id.logout_button);

        //if(!session.loggedin()){
         //   logout();
        //}
//        HashMap<String,String> user= session.getUserDetails();
//        String name=user.get(Session.KEY_NAME);
//        String dob=user.get(Session.KEY_DOB);
//        String city=user.get(Session.KEY_CITY);
//        String mobile=user.get(Session.KEY_MOBILE);

        tv1.setText(result[0]);
        tv2.setText(result[4]);
        tv3.setText(result[1]);
        tv4.setText(result[2]);
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_showprofile, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_logout) {
            db.delRow();
            session.setLoggedin(false, result[0], result[4],result[1],result[2]);
            finish();
            startActivity(new Intent(SessionActivity.this, MainActivity.class));
        }

        return super.onOptionsItemSelected(item);
    }

}
