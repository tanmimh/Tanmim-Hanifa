package travelpals.travelpals;

import android.content.Intent;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.EditText;
import android.widget.ImageButton;

import com.android.volley.Response;

import org.json.JSONException;
import org.json.JSONObject;

public class MainMenuActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main_menu);

        final ImageButton ibMyPlanImageButton = (ImageButton) findViewById(R.id.ibMyPlanImageButton);
        final ImageButton ibSearchImageButton = (ImageButton) findViewById(R.id.ibSearchImageButton);
        final ImageButton ibMessageImageButton = (ImageButton) findViewById(R.id.ibMessageImageButton);
        final ImageButton ibUserImageButton = (ImageButton) findViewById(R.id.ibUserImageButton);


        Intent intent = getIntent();
        final String username = intent.getStringExtra("username");
        final String name = intent.getStringExtra("name");
        final String dob = intent.getStringExtra("dob");
        final String email = intent.getStringExtra("email");

        final String gender = intent.getStringExtra("gender");



        ibUserImageButton.setOnClickListener(new View.OnClickListener(){
            @Override
            public void onClick(View v) {
                Intent userIntent = new Intent(MainMenuActivity.this, UserAreaActivity.class);
                userIntent.putExtra("name", name);
                userIntent.putExtra("username", username);
                userIntent.putExtra("dob", dob);
                userIntent.putExtra("email", email);

                userIntent.putExtra("gender", gender);

                MainMenuActivity.this.startActivity(userIntent);
            }
        });

        ibSearchImageButton.setOnClickListener(new View.OnClickListener(){
            @Override
            public void onClick(View v) {
                Intent searchIntent = new Intent(MainMenuActivity.this, SearchActivity.class);
                MainMenuActivity.this.startActivity(searchIntent);
            }
        });

        ibMessageImageButton.setOnClickListener(new View.OnClickListener(){
            @Override
            public void onClick(View v) {
                Intent messageIntent = new Intent(MainMenuActivity.this, MessageActivity.class);
                MainMenuActivity.this.startActivity(messageIntent);
            }
        });

        ibMyPlanImageButton.setOnClickListener(new View.OnClickListener(){
            @Override
            public void onClick(View v) {
                Intent myPlanIntent = new Intent(MainMenuActivity.this, MyPlanActivity.class);
                MainMenuActivity.this.startActivity(myPlanIntent);
            }
        });


    }
}
