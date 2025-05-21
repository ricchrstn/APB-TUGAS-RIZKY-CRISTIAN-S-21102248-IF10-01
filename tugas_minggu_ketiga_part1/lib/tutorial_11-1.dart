import 'package:flutter/material.dart';
import 'tutorial_11-2.dart'; // Import file tutorial_11-2.dart

class Tutorial11_1 extends StatelessWidget {
  const Tutorial11_1({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('Tutorial 11-1'),
      ),
      body: PageView(
        children: [
          // Halaman Home
          Center(
            child: InkWell(
              onTap: () {
                Navigator.pop(context); // Kembali ke halaman sebelumnya
              },
              child: const Text(
                'Go to Home page',
                style: TextStyle(fontSize: 30),
              ),
            ),
          ),

          // Halaman Email (Diganti dengan Tutorial11_2)
          const Tutorial11_2(),

          // Halaman Profile
          const Center(
            child: Text(
              'Profile page',
              style: TextStyle(fontSize: 30),
            ),
          ),
        ],
      ),
    );
  }
}
