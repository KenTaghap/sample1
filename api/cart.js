const { MongoClient } = require('mongodb');

const connectionString = "mongodb+srv://jasondionanao87:Pogiakoxd123@cluster0.kzbqdga.mongodb.net/Joyicedb";

module.exports = async (req, res) => {
    try {
        const client = new MongoClient(connectionString, { useUnifiedTopology: true });
        await client.connect();

        const db = client.db('Joyicedb');
        const collection = db.collection('JIp');

        if (req.body.Username) {
            const filter = { username: req.body.Username };
            const userInfo = await collection.findOne(filter);

            res.status(200).json({ message: "Data retrieved", userInfo });
        } else {
            res.status(400).json({ error: "Username not provided" });
        }
    } catch (error) {
        console.error(error);
        res.status(500).json({ error: "An error occurred" });
    } finally {
        await client.close();
    }
};
