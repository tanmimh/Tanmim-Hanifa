package travelpals.travelpals;

import android.content.Intent;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.view.WindowManager;
import android.widget.Button;
import android.widget.EditText;

import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.toolbox.Volley;

import org.json.JSONException;
import org.json.JSONObject;

public class SearchActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_search);
        getWindow().setSoftInputMode(WindowManager.LayoutParams.SOFT_INPUT_ADJUST_PAN);

        setTitle("Search");

        final EditText etDestination = (EditText) findViewById(R.id.etDestination);
        final EditText etStartDate = (EditText) findViewById(R.id.etStartDate);
        final EditText etEndDate = (EditText) findViewById(R.id.etEndDate);

        final Button btSearch = (Button) findViewById(R.id.btSearch);

        btSearch.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                final String destination = etDestination.getText().toString();
                final String startDate = etStartDate.getText().toString();
                final String endDate = etEndDate.getText().toString();


                Response.Listener<String> responseListener = new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try {
                            JSONObject jsonResponse = new JSONObject(response);
                            boolean success = jsonResponse.getBoolean("success");

                            if(success){
                                String destination = jsonResponse.getString("destination");
                                String startDate = jsonResponse.getString("startDate");
                                String endDate = jsonResponse.getString("endDate");


                                Intent intent = new Intent(SearchActivity.this, SearchResultActivity.class);
                                intent.putExtra("destination", destination);
                                intent.putExtra("startDate", startDate);
                                intent.putExtra("endDate", endDate);

                                SearchActivity.this.startActivity(intent);
                            }else{
                                AlertDialog.Builder builder = new AlertDialog.Builder(SearchActivity.this);
                                builder.setMessage("Search failed")
                                        .setNegativeButton("Try again", null)
                                        .create()
                                        .show();
                            }
                        } catch (JSONException e) {
                            e.printStackTrace();
                        }

                    }
                };
                SearchRequest searchRequest = new SearchRequest(destination, startDate, endDate, responseListener);
                RequestQueue queue = Volley.newRequestQueue(SearchActivity.this);
                queue.add(searchRequest);
            }
        });



    }
}
