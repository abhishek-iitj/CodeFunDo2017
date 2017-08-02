package com.example.jarvis.loginapplication;


import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

import org.apache.http.HttpResponse;
import org.apache.http.client.ClientProtocolException;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import android.app.AlertDialog;
import android.app.Fragment;
import android.app.ProgressDialog;
import android.content.Intent;
import android.graphics.Color;
import android.graphics.drawable.ColorDrawable;
import android.os.AsyncTask;
import android.os.Bundle;
import android.app.Activity;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ListView;
import android.widget.SimpleAdapter;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.VolleyLog;
import com.android.volley.toolbox.JsonArrayRequest;

public class fetchActivity extends AppCompatActivity {

    ProgressDialog pd;
    String JSON_STRING;

    // Log tag
    private static final String TAG = fetchActivity.class.getSimpleName();

    // Movies json url
    private static final String url = "http://codefundof9.azurewebsites.net/fetchMerchant.php";
    private ProgressDialog pDialog;
    private List<Movie> movieList = new ArrayList<Movie>();
    private ListView listView;
    private CustomListAdapter adapter;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_fetch);

    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_profile, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings) {
            return true;
        }
        if (id == R.id.action_about) {
            Intent intent = new Intent(getApplicationContext(), AboutApp.class);
            startActivity(intent);
        }
        if (id == R.id.action_profile) {
            Intent intent = new Intent(getApplicationContext(), SessionActivity.class);
            startActivity(intent);
        }
        if (id == R.id.action_fetch) {
            // new BackgroundTask().execute();
            //here the mainactivity of the app begins
            listView = (ListView) findViewById(R.id.list);
            adapter = new CustomListAdapter(this, movieList);
            listView.setAdapter(adapter);

            pDialog = new ProgressDialog(this);
            // Showing progress dialog before making http request
            pDialog.setMessage("Finding rooms for you....");
            pDialog.show();

            // changing action bar color
//            getActionBar().setBackgroundDrawable(
//                    new ColorDrawable(Color.parseColor("#1b1b1b")));

            // Creating volley request obj
            JsonArrayRequest movieReq = new JsonArrayRequest(url,
                    new Response.Listener<JSONArray>() {
                        @Override
                        public void onResponse(JSONArray response) {
                            Log.d(TAG, response.toString()+response.length());

                            //Toast.makeText(fetchActivity.this, response.length(), Toast.LENGTH_SHORT).show();
                            // Parsing json
                            for (int i = 0; i < response.length(); i++) {
                                try {

                                    JSONObject obj = response.getJSONObject(i);
                                    Movie movie = new Movie();
                                    movie.setName(obj.getString("Name"));
                                    movie.setMobile(obj.getString("Mobile"));
                                    //movie.setThumbnailUrl(obj.getString("image"));
//                                    movie.setRating(((Number) obj.get("rating"))
//                                            .doubleValue());
                                    movie.setRoom(Integer.toString(obj.getInt("Room")));
                                    movie.setAddress(obj.getString("Address"));

                                    movieList.add(movie);



                                } catch (JSONException e) {
                                    e.printStackTrace();
                                }

                            }
                            hidePDialog();
                            // notifying list adapter about data changes
                            // so that it renders the list view with updated data
                            adapter.notifyDataSetChanged();
                        }
                    }, new Response.ErrorListener() {
                @Override
                public void onErrorResponse(VolleyError error) {
                    VolleyLog.d(TAG, "Error: " + error.getMessage());
                    hidePDialog();

                }
            });

            // Adding request to request queue
            AppController.getInstance().addToRequestQueue(movieReq);
        }

            if (id == R.id.action_fetchmess) {
                return true;
            }

            return super.onOptionsItemSelected(item);
        }



    @Override
    public void onDestroy() {
        super.onDestroy();
        hidePDialog();
    }

    private void hidePDialog() {
        if (pDialog != null) {
            pDialog.dismiss();
            pDialog = null;
        }
    }

    public void visitProfile(View view){
        Intent intent=new Intent(getApplicationContext(),SessionActivity.class);
        startActivity(intent);

    }
    public void openAppabout(View view){
        Intent intent=new Intent(getApplicationContext(),AboutApp.class);
        startActivity(intent);

    }

//    public void fetchJSON(View view){
//        //new BackgroundTask().execute();
//
//    }

    /*class BackgroundTask extends AsyncTask<Void, Void,String>{
        String json_url;
        @Override
        protected void onPreExecute(){
            json_url="http://codefundof9.azurewebsites.net/fetchMerchant.php";

            pd = new ProgressDialog(fetchActivity.this);
            pd.setMessage("Please Wait");
            pd.show();

        }
        @Override
        protected String doInBackground(Void... voids){
            try{
                URL url =new URL (json_url);
                HttpURLConnection httpURLConnection = (HttpURLConnection) url.openConnection();
                InputStream inputStream = httpURLConnection.getInputStream();
                BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(inputStream));
                StringBuilder stringBuilder = new StringBuilder();
                while((JSON_STRING = bufferedReader.readLine())!=null){
                    stringBuilder.append(JSON_STRING+"\n");
                }
                bufferedReader.close();
                inputStream.close();
                httpURLConnection.disconnect();

                return stringBuilder.toString().trim();
            }
            catch(MalformedURLException e){
                e.printStackTrace();
            }
            catch (IOException e){
                e.printStackTrace();
            }
            return null;

        }


        @Override
        protected void onProgressUpdate(Void... values){
            super.onProgressUpdate(values);
        }



        @Override
        protected void onPostExecute(String result){
            pd.dismiss();

            String test="",finalResult="";
            int i;
            for(i=1;i<result.length()-1;i++){
                if(result.charAt(i)=='[')
                        test+="\n";
                else if(result.charAt(i)==']')
                    test+="\n";
                else if(result.charAt(i)=='"')
                        continue;
                else if(result.charAt(i)=='+') {
                    finalResult += "\n" + test;
                    test="";
                }
                else if(result.charAt(i)==',')
                    continue;
                else{
                    test+=result.charAt(i);

                }

            }




            TextView tv=(TextView)findViewById(R.id.tv);
            tv.setText(finalResult);
        }
    }*/
}
