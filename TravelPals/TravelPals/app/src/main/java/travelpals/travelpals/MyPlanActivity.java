package travelpals.travelpals;

import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.view.WindowManager;
import android.widget.EditText;

import android.widget.Button;
import android.widget.TextView;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonObjectRequest;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class MyPlanActivity extends AppCompatActivity {

    EditText destination, description, startDate, endDate;
    TextView result;
    Button add_plan, show;
    RequestQueue requestQueue;
    String insertUrl1 = "http://doc.gold.ac.uk/~jsusz001/software/MyPlans.php";
    String showUrl1 ="http://doc.gold.ac.uk/~jsusz001/software/showPlans.php";



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_my_plan);

        setTitle("Create a Plan");


        getWindow().setSoftInputMode(WindowManager.LayoutParams.SOFT_INPUT_ADJUST_PAN);


        destination = (EditText) findViewById(R.id.destination);
        startDate = (EditText) findViewById(R.id.startDate);
        endDate = (EditText) findViewById(R.id.endDate);
        description =(EditText) findViewById(R.id.description);
        add_plan = (Button) findViewById(R.id.button);
        show = (Button) findViewById(R.id.button3);
        result = (TextView) findViewById(R.id.result);


        requestQueue = Volley.newRequestQueue(getApplicationContext());

        show.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view){
                JSONObject obj = new JSONObject();
            JsonObjectRequest jsonObjectRequest = new JsonObjectRequest(Request.Method.POST,
                    showUrl1,obj, new Response.Listener<JSONObject>() {
                @Override
                public void onResponse(JSONObject response) {
                    try {
                        JSONArray plans = response.getJSONArray("plans");
                        for(int i=0; i<plans.length(); i++){
                            JSONObject plan = plans.getJSONObject(i);

                            String destination = plan.getString("destination");
                            //String startDate = plan.getString("startDate");
                           // String endDate = plan.getString("endDate");
                            String description = plan.getString("description");
//
//                            result.append(destination + " " + startDate +" "+ endDate +" "+ description + "" +
//                                    "\n" );
                            result.append(destination + "  " +description + " " + "\n" );

                        }
                        result.append("===\n");
                    } catch (JSONException e) {
                        e.printStackTrace();
                    }
                }
            }, new Response.ErrorListener(){
                @Override
                public void onErrorResponse(VolleyError error){

                }
            });
                requestQueue.add(jsonObjectRequest);
       }

        });
    add_plan.setOnClickListener(new View.OnClickListener(){
                @Override
        public void onClick(View view){
        StringRequest request = new StringRequest(Request.Method.POST, insertUrl1, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {

                System.out.println(response.toString());
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {

            }
        }) {

            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> parameters = new HashMap<String, String>();
                parameters.put("destination", destination.getText().toString());
                parameters.put("startDate", startDate.getText().toString());
                parameters.put("endDate", endDate.getText().toString());
                parameters.put("description", description.getText().toString());

                return parameters;
            }
        };
        requestQueue.add(request);

    }
    });


        }

    }