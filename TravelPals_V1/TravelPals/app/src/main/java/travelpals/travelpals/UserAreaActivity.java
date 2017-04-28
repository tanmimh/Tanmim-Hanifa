package travelpals.travelpals;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.WindowManager;
import android.widget.EditText;

public class UserAreaActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_user_area);

        setTitle("Profile");

        getWindow().setSoftInputMode(WindowManager.LayoutParams.SOFT_INPUT_ADJUST_PAN);


        final EditText etUsername = (EditText) findViewById(R.id.etUsername);
        final EditText etDob = (EditText) findViewById(R.id.etDob);
        final EditText etName = (EditText) findViewById(R.id.etName);
        final EditText etEmail = (EditText) findViewById(R.id.etEmail);

        final EditText etGender = (EditText) findViewById(R.id.etGender);


        Intent userIntent = getIntent();
        String name = userIntent.getStringExtra("name");
        String email = userIntent.getStringExtra("email");
        String dob = userIntent.getStringExtra("dob");
        String username = userIntent.getStringExtra("username");

        String gender = userIntent.getStringExtra("gender");


        etUsername.setText(username);
        etName.setText(name);
        etDob.setText(dob);
        etEmail.setText(email);

        etGender.setText(gender);


    }
}
