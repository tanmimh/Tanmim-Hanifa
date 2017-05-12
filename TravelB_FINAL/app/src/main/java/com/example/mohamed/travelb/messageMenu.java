package com.example.mohamed.travelb;

import android.content.Intent;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;

import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.toolbox.Volley;

import org.json.JSONException;
import org.json.JSONObject;

public class messageMenu extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_message_menu);




        final Button bSent = (Button) findViewById(R.id.bSent);
        final Button bReceived = (Button) findViewById(R.id.bReceived);

        final Intent intent = getIntent();
        String name = intent.getStringExtra("name");
        final String id = intent.getStringExtra("user_id");

        Log.d("id firstddd",id+"");
        Log.d("chicooooo",id+"");







        bSent.setOnClickListener(new View.OnClickListener(){

            @Override
            public void onClick(View v) {
                Intent registerIntent = new Intent(messageMenu.this, SearchActivity.class);
                registerIntent.putExtra("my_id",id+"");
                messageMenu.this.startActivity(registerIntent);
            }
        });





        bReceived.setOnClickListener(new View.OnClickListener(){

            @Override
            public void onClick(View v) {
                Intent messageIntent = new Intent(messageMenu.this, MessageActivity.class);
                messageIntent.putExtra("my_id",id+"");
                Log.d("MY IDDDDDD",id+"");
                messageMenu.this.startActivity(messageIntent);
            }
        });







    }
}





