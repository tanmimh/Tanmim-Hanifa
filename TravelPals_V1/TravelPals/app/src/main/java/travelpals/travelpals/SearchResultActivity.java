package travelpals.travelpals;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.EditText;

public class SearchResultActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_search_result);

        setTitle("Results");

        final EditText etDestination = (EditText) findViewById(R.id.etDestination);
        final EditText etStartDate = (EditText) findViewById(R.id.etStartDate);
        final EditText etEndDate = (EditText) findViewById(R.id.etEndDate);

        Intent intent = getIntent();
        final String destination = intent.getStringExtra("destination");
        final String startDate = intent.getStringExtra("startDate");
        final String endDate = intent.getStringExtra("endDate");

        etDestination.setText(destination);
        etStartDate.setText(startDate);
        etEndDate.setText(endDate);


    }
}
